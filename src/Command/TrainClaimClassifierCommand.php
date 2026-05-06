<?php

namespace App\Command;

use App\Service\MLClaimClassifier;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class TrainClaimClassifierCommand extends Command
{
    protected static $defaultName = 'app:train-claim-classifier';
    
    private $classifier;
    
    public function __construct(MLClaimClassifier $classifier)
    {
        parent::__construct();
        $this->classifier = $classifier;
    }
    
    protected function configure(): void
    {
        $this->setDescription('Entraîne le modèle de classification IA des réclamations');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        
        $io->title('🤖 Entraînement du classifieur IA de réclamations');
        
        $io->section('📚 Entraînement en cours avec les données d\'exemple...');
        $this->classifier->train();
        
        $io->success([
            '✅ Modèle entraîné avec succès !',
            '📁 Fichiers sauvegardés dans /var/',
            '🎯 Vous pouvez maintenant utiliser l\'IA pour classer les réclamations'
        ]);
        
        return Command::SUCCESS;
    }
}