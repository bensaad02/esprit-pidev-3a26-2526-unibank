<?php

namespace App\Controller;

use App\Service\ChatbotService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/chatbot')]
class ChatbotController extends AbstractController
{
    #[Route('/chat', name: 'app_chatbot_chat', methods: ['POST'])]
    public function chat(Request $request, ChatbotService $chatbotService): JsonResponse
    {
        $data    = json_decode($request->getContent(), true);
        $message = trim($data['message'] ?? '');
        $history = $data['history'] ?? [];

        if (empty($message)) {
            return $this->json(['error' => 'Message vide.'], 400);
        }

        if (strlen($message) > 1000) {
            return $this->json(['error' => 'Message trop long.'], 400);
        }

        $response = $chatbotService->chat($message, $history);

        return $this->json(['response' => $response]);
    }

    #[Route('/transcribe', name: 'app_chatbot_transcribe', methods: ['POST'])]
    public function transcribe(Request $request, HttpClientInterface $http): JsonResponse
    {
        $file = $request->files->get('audio');
        if (!$file) {
            return $this->json(['error' => 'Aucun fichier audio reçu.'], 400);
        }

        try {
            $boundary  = uniqid('unibot', true);
            $audioBytes = file_get_contents($file->getPathname());
            $ext       = strtolower($file->getClientOriginalExtension() ?: 'webm');
            $filename  = 'audio.' . $ext;
            $mime      = $file->getMimeType() ?: 'audio/webm';
            $body  = "--{$boundary}\r\n";
            $body .= "Content-Disposition: form-data; name=\"file\"; filename=\"{$filename}\"\r\n";
            $body .= "Content-Type: {$mime}\r\n\r\n";
            $body .= $audioBytes . "\r\n";
            $body .= "--{$boundary}--\r\n";

            $response = $http->request('POST', 'http://localhost:8001/transcribe', [
                'headers' => [
                    'Content-Type' => "multipart/form-data; boundary={$boundary}",
                    'Accept'       => 'application/json',
                ],
                'body'    => $body,
                'timeout' => 30,
            ]);

            $data = $response->toArray();
            return $this->json(['text' => $data['text'] ?? '', 'language' => $data['language'] ?? '']);
        } catch (\Exception $e) {
            return $this->json(['error' => 'Transcription indisponible.'], 500);
        }
    }

    #[Route('/status', name: 'app_chatbot_status', methods: ['GET'])]
    public function status(ChatbotService $chatbotService): JsonResponse
    {
        return $this->json(['available' => $chatbotService->isAvailable()]);
    }
}
