@echo off
REM UniBank+ AI - One-Click Launcher for Windows
REM Run this script to set up and start everything automatically.
REM Usage: start.bat (double-click or run from cmd)

setlocal enabledelayedexpansion
cd /d "%~dp0"

set VENV_DIR=%~dp0venv
set MODEL_NAME=qwen2.5:3b
set WHISPER_MODEL=small
set SERVER_PORT=8000

set STEP=0
set TOTAL=8

echo.
echo ==================================================
echo    UniBank+ AI - Automated Setup ^& Launcher
echo    Windows Edition
echo ==================================================
echo.

REM ──────────────────────────────────────────
REM Step 1: Check Python
REM ──────────────────────────────────────────
set /a STEP+=1
echo [%STEP%/%TOTAL%] Checking Python...
echo -------------------------------------------------
where python >nul 2>&1
if %errorlevel% equ 0 (
    for /f "tokens=*" %%i in ('python --version 2^>^&1') do set PY_VERSION=%%i
    echo   [OK] !PY_VERSION! found
) else (
    where python3 >nul 2>&1
    if %errorlevel% equ 0 (
        for /f "tokens=*" %%i in ('python3 --version 2^>^&1') do set PY_VERSION=%%i
        echo   [OK] !PY_VERSION! found
        set PYTHON_CMD=python3
        goto :python_found
    )
    echo   [FAIL] Python 3 not found.
    echo   Please install Python 3.8+ from https://www.python.org/downloads/
    echo   Make sure to check "Add Python to PATH" during installation.
    pause
    exit /b 1
)
set PYTHON_CMD=python
:python_found

REM ──────────────────────────────────────────
REM Step 2: Check/Install Ollama
REM ──────────────────────────────────────────
set /a STEP+=1
echo.
echo [%STEP%/%TOTAL%] Checking Ollama...
echo -------------------------------------------------
where ollama >nul 2>&1
if %errorlevel% equ 0 (
    echo   [OK] Ollama is installed
) else (
    echo   [..] Ollama not found. Installing...
    echo   [..] Downloading Ollama installer for Windows...
    
    REM Download Ollama Windows installer
    powershell -Command "& {Invoke-WebRequest -Uri 'https://ollama.com/download/OllamaSetup.exe' -OutFile '%TEMP%\OllamaSetup.exe'}"
    
    if exist "%TEMP%\OllamaSetup.exe" (
        echo   [..] Running Ollama installer... Please follow the installation wizard.
        start /wait "" "%TEMP%\OllamaSetup.exe"
        del "%TEMP%\OllamaSetup.exe" >nul 2>&1
        
        REM Refresh PATH
        set "PATH=%PATH%;%LOCALAPPDATA%\Programs\Ollama"
        
        where ollama >nul 2>&1
        if %errorlevel% equ 0 (
            echo   [OK] Ollama installed successfully
        ) else (
            echo   [FAIL] Ollama installation failed or not in PATH.
            echo   Please install manually from https://ollama.com/download
            echo   Then re-run this script.
            pause
            exit /b 1
        )
    ) else (
        echo   [FAIL] Failed to download Ollama installer.
        echo   Please install manually from https://ollama.com/download
        pause
        exit /b 1
    )
)

REM ──────────────────────────────────────────
REM Step 3: Start Ollama server
REM ──────────────────────────────────────────
set /a STEP+=1
echo.
echo [%STEP%/%TOTAL%] Starting Ollama server...
echo -------------------------------------------------
curl -s http://localhost:11434/api/tags >nul 2>&1
if %errorlevel% equ 0 (
    echo   [OK] Ollama server already running
) else (
    echo   [..] Starting Ollama server in a new window...
    start "Ollama Server" cmd /c "ollama serve"
    
    REM Wait for server to be ready
    set READY=0
    for /l %%i in (1,1,20) do (
        if !READY! equ 0 (
            timeout /t 1 /nobreak >nul
            curl -s http://localhost:11434/api/tags >nul 2>&1
            if !errorlevel! equ 0 (
                set READY=1
            )
        )
    )
    
    if !READY! equ 1 (
        echo   [OK] Ollama server running in a separate window
        echo   Note: Keep that window open while using UniBank+.
    ) else (
        echo   [FAIL] Failed to start Ollama server. Try running 'ollama serve' manually.
        pause
        exit /b 1
    )
)

REM ──────────────────────────────────────────
REM Step 4: Pull model if needed
REM ──────────────────────────────────────────
set /a STEP+=1
echo.
echo [%STEP%/%TOTAL%] Checking model '%MODEL_NAME%'...
echo -------------------------------------------------
ollama list 2>nul | findstr /C:"%MODEL_NAME%" >nul 2>&1
if %errorlevel% equ 0 (
    echo   [OK] Model '%MODEL_NAME%' already downloaded
) else (
    echo   [..] Downloading model '%MODEL_NAME%' (this may take a few minutes^)...
    ollama pull %MODEL_NAME%
    echo   [OK] Model '%MODEL_NAME%' downloaded
)

REM ──────────────────────────────────────────
REM Step 5: Create venv & install dependencies
REM ──────────────────────────────────────────
set /a STEP+=1
echo.
echo [%STEP%/%TOTAL%] Setting up Python environment...
echo -------------------------------------------------
if exist "%VENV_DIR%\Scripts\activate.bat" (
    echo   [OK] Virtual environment already exists
    call "%VENV_DIR%\Scripts\activate.bat"
    
    REM Quick check for missing packages
    pip show fastapi >nul 2>&1
    if %errorlevel% neq 0 (
        echo   [..] Some packages missing, installing...
        pip install -r requirements.txt --quiet
        echo   [OK] Dependencies installed
    ) else (
        echo   [OK] All dependencies already installed
    )
) else (
    echo   [..] Creating virtual environment...
    %PYTHON_CMD% -m venv "%VENV_DIR%"
    call "%VENV_DIR%\Scripts\activate.bat"
    echo   [..] Installing dependencies (first time, may take a few minutes^)...
    pip install --upgrade pip --quiet
    pip install -r requirements.txt --quiet
    echo   [OK] Virtual environment created and dependencies installed
)

REM ──────────────────────────────────────────
REM Step 6: Build RAG index if needed
REM ──────────────────────────────────────────
set /a STEP+=1
echo.
echo [%STEP%/%TOTAL%] Checking RAG knowledge base index...
echo -------------------------------------------------
if exist ".chroma_db" (
    echo   [OK] RAG index already exists
    REM Rebuild if knowledge.txt is newer (simplified check)
    for %%A in ("dataset\knowledge.txt") do set KB_DATE=%%~tA
    for %%A in (".chroma_db") do set IDX_DATE=%%~tA
    echo   [OK] RAG index up to date
) else (
    echo   [..] Building RAG index for the first time...
    python -c "from rag_engine import build_index; build_index()"
    echo   [OK] RAG index built
)

REM ──────────────────────────────────────────
REM Step 7: Download Whisper model if needed
REM ──────────────────────────────────────────
set /a STEP+=1
echo.
echo [%STEP%/%TOTAL%] Checking Whisper speech-to-text model...
echo -------------------------------------------------
python -c "from faster_whisper.utils import download_model; import os; d=download_model('%WHISPER_MODEL%',output_dir=None); print('yes' if os.path.isdir(d) else 'no')" 2>nul | findstr /C:"yes" >nul 2>&1
if %errorlevel% equ 0 (
    echo   [OK] Whisper model '%WHISPER_MODEL%' already downloaded
) else (
    echo   [..] Downloading Whisper model '%WHISPER_MODEL%' (this may take a minute^)...
    python -c "from faster_whisper import WhisperModel; print('Downloading...'); m=WhisperModel('%WHISPER_MODEL%',device='cpu',compute_type='int8'); print('Done.')"
    echo   [OK] Whisper model '%WHISPER_MODEL%' downloaded
)

REM ──────────────────────────────────────────
REM Step 8: Start FastAPI server
REM ──────────────────────────────────────────
set /a STEP+=1
echo.
echo [%STEP%/%TOTAL%] Starting UniBank+ AI server...
echo -------------------------------------------------
curl -s "http://localhost:%SERVER_PORT%/health" >nul 2>&1
if %errorlevel% equ 0 (
    echo   [SKIP] Server already running on port %SERVER_PORT%
    echo.
    echo ==================================================
    echo    UniBank+ AI is ready!
    echo    Server: http://localhost:%SERVER_PORT%
    echo ==================================================
    echo.
) else (
    REM Kill anything on the port
    for /f "tokens=5" %%a in ('netstat -ano ^| findstr :%SERVER_PORT% ^| findstr LISTENING 2^>nul') do (
        taskkill /PID %%a /F >nul 2>&1
    )
    timeout /t 1 /nobreak >nul
    
    echo.
    echo ==================================================
    echo    UniBank+ AI is starting!
    echo    Server: http://localhost:%SERVER_PORT%
    echo    Press Ctrl+C to stop
    echo ==================================================
    echo.
    
    python server.py
)

endlocal
