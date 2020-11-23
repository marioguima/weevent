<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MultiformEvent extends Component
{
    // informações básicas
    public $title = '';
    public $video_platform = 'youtube';
    public $video_id = '';

    // Apresentadores e colaboradores
    public $participants = array(
        array('full_name' => '',
              'email' => '',
              'role' => '',
              'photo' => '',
              )
        );

    public $step = 0;

    private $stepActions = [
        'next1',
        'next2',
        'next3'
    ];

    // Guarda a sessão que o usuário está em cada passo
    public $steps_active_session = [
        'information' => 'basic',
        'scheduler' => '',
    ];

    protected $listeners = ['activeSession' => 'setActiveSession'];

    public function render()
    {
        return view('livewire.multiform-event');
    }

    public function mount() {
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

        // cria uma chave autoincrement virtual
        // serve apenas para garantir um valor único para wire.model="$participant.{{ $seq_id }}.seq_id"
        // $seq_id = (count($this->participants) > 0) ? (end($this->participants)['seq_id'] + 1) : 0;
        array_push($this->participants, array('full_name' => '',
                                              'email' => '',
                                              'role' => '',
                                              'photo' => '',
                                            )
        );
    }

    /**
     * Aqui, removeremos o item com a chave fornecida
     * da matriz de participantes, então uma linha renderizada desaparece.
     */
    public function removeParticipant(int $i): void
    {
        unset($this->participants[$i]);

        // array_values — Retorna todos os valores de um array
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
