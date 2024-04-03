<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class BobotShowComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    protected $userId;
    protected $token;
    protected $bobot;
    protected $gmmCriteria;

    public function __construct($userId, $token, $bobot, $gmmCriteria)
    {
        $this->userId = $userId;
        $this->token = $token;
        $this->bobot = $bobot;
        $this->gmmCriteria = $gmmCriteria;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bobot-show-component', [
            'user' => User::query()->firstWhere('id', $this->userId),
            'user_id' => $this->userId,
            'token' => $this->token,
            'bobot' => $this->bobot,
            'gmm_criteria' => $this->gmmCriteria,
        ]);
    }
}
