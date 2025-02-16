<?php

namespace App\Livewire;

use App\Livewire\Forms\FormCreateArticle;
use App\Models\Tag;
use Livewire\Component;

class CreateArticles extends Component
{
    public bool $openCreate = false;

    public FormCreateArticle $cform;

    public function render()
    {
        $tags = Tag::select('name', 'id') -> orderBy('name') -> get();
        return view('livewire.create-articles', compact('tags'));
    }

    public function store() {
        $this -> cform -> formStore();
        $this -> cancelar();
        $this -> dispatch('onArticleCreated') -> to(ShowUsersArticles::class);
        $this -> dispatch('mensaje', 'Artículo creado');
    }

    public function cancelar(){
        $this -> openCreate = false;
        $this -> cform -> formReset();
    }
}
