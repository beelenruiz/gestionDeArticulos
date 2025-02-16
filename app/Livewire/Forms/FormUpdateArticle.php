<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormUpdateArticle extends Form
{
    public ?Article $article = null;

    public string $title = '';

    #[Rule(['required', 'string', 'min:15', 'max:300'])]
    public string $content = "";

    #[Rule(['required', 'exists:tags,id'])]    
    public int $tag_id = -1;

    public function rules(): array{
        return [
            'title' => ['required', 'string', 'min:3', 'max:50', 'unique:articles,title,'. $this -> article -> id]
        ];
    }

    public function setArticle(Article $article){
        $this -> article = $article;
        $this -> title = $article -> title;
        $this -> content = $article -> content;
        $this -> tag_id = $article -> tag_id;
    }

    public function formUpdate(){
        $this -> validate();
        $this -> article -> update([
            'title' => $this -> title,
            'content' => $this -> content,
            'tag_id' => $this -> tag_id
        ]);
    }

    public function formReset(){
        $this->resetValidation();
        $this->reset();
    }
}
