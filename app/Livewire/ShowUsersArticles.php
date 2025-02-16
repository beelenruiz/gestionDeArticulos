<?php

namespace App\Livewire;

use App\Livewire\Forms\FormUpdateArticle;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsersArticles extends Component
{
    use WithPagination;

    public string $campo = "id", $orden = "desc";
    public string $buscar = "";

    public FormUpdateArticle $uform;
    public bool $openUpdate = false;

    #[On('onArticleCreated')]
    public function render()
    {
        $articles = DB::table('articles')
        -> join('users', 'user_id', '=', 'users.id')
        -> join('tags', 'tag_id', '=', 'tags.id')
        ->select('articles.*', 'tags.name', 'color')
        ->where('user_id', Auth::user()->id)
        ->where(function ($query) {
            $query->where('title', 'like', "%{$this->buscar}%")
                ->orwhere('tags.name', 'like', "%{$this->buscar}%")
                ->orWhere('content', 'like', "%{$this->buscar}%");
        })
        ->orderBy($this -> campo, $this -> orden)
        -> paginate(5);

        $tags = Tag::select('name', 'id') -> orderBy('name') -> get();

        return view('livewire.show-users-articles', compact('articles', 'tags'));
    }

    // ------------------------ ordenar -------------------------
    public function ordenar(string $campo)
    {
        $this->orden = ($this->orden == 'asc') ? 'desc' : 'asc';
        $this->campo = $campo;
    }

    // ------------------------- borrar --------------------------
    public function delete(Article $article){
        $this -> authorize('delete', $article);
        $article ->  delete();
        $this -> dispatch('mensaje', 'Artículo borrado');
    }

    // ------------------------ editar ----------------------------
    public function edit(Article $article){
        $this -> authorize('update', $article);
        $this -> uform -> setArticle($article);
        $this -> openUpdate = true;
    }

    public function update(){
        $this -> authorize('update', $this -> uform -> article);
        $this -> uform -> formUpdate();
        $this -> cancelar();
        $this -> dispatch('mensaje', 'Artículo editado');
    }

    public function cancelar(){
        $this -> openUpdate = false;
        $this -> uform -> formReset();
    }
}
