<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MultiformEvent extends Component
{
    // informações básicas
    public $title;
    public $video_platform;
    public $video_id;

    // Apresentadores e colaboradores
    public $participants = [];

    public $step = 0;

    public $event;

    private $stepActions = [
        'next1',
        'next2',
        'next3'
    ];

    // Guarda a sessão que o usuário está em cada passo
    public $steps_active_session = ['basic', '', ''];

    protected $listeners = ['activeSession' => 'setActiveSession'];

    public function render()
    {
        return view('livewire.multiform-event');
    }

    public function mount() {
        $this->step = 0;
        $this->video_platform = 'youtube';

        // Primeiro verificamos se há algum valor antigo para os elementos do formulário que queremos renderizar.
        // Quando um usuário enviou um formulário com valores que não passaram na validação, exibimos esses valores antigos.
        // $this->participants = old('http_client_participants', $this->participants);
    }

    /**
     * controla a sessão ativa em cada passo
     */
    public function setActiveSession($session) {
        $this->steps_active_session[$this->step] = $session;
    }

    public function jumpToStep($step) {
        $this->step = $step;
    }

    public function changeVideoPlatform($videoPlatform) {
        $this->video_platform = $videoPlatform;
    }

    public function decreaseStep() {
        $this->step--;
    }

    public function submit() {
        $action = $this->stepActions[$this->step];
        $this->$action();
    }

    public function next() {
        $action = $this->stepActions[$this->step];
        $this->$action();
    }

    public function next1() {
        $this->validate([
            'title' => 'required|min:4',
            // 'email' => 'required|email',
        ]);

        $this->step++;
    }

    public function next2() {
        $this->step++;
    }

    public function next3() {
        $this->step++;
    }

    /**
     * Esta função irá adicionar um par de valores de participante vazio
     * fazendo com que uma linha extra seja renderizada.
     */
    public function addParticipant(): void
    {
        if (! $this->canAddMoreParticipants()) {
            return;
        }

        $this->participants[] = [
            'full_name' => '',
            'email' => '',
            'role' => '',
            'photo' => ''
        ];
    }

    /**
     * Aqui, removeremos o item com a chave fornecida
     * da matriz de participantes, então uma linha renderizada desaparece.
     */
    public function removeParticipant(int $i): void
    {
        unset($this->participants[$i]);

        $this->participants = array_values($this->participants);
    }

    /**
     * Verifica se pode adicionar um novo participante
     */
    public function canAddMoreParticipants(): bool
    {
        return count($this->participants) < 6;
    }

}
