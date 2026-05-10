<div class="card-body">
    <fieldset>
        <legend>Dados do Livro</legend>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome"
                        value="{{ old('nome', $livro->nome ?? '') }}"
                        class="form-control" required
                        placeholder="Digite o nome do livro">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" name="autor" id="autor"
                        value="{{ old('autor', $livro->autor ?? '') }}"
                        class="form-control" required
                        placeholder="Digite o autor">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="editora">Editora</label>
                    <input type="text" name="editora" id="editora"
                        value="{{ old('editora', $livro->editora ?? '') }}"
                        class="form-control"
                        placeholder="Digite a editora">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="idioma">Idioma</label>
                    <input type="text" name="idioma" id="idioma"
                        value="{{ old('idioma', $livro->idioma ?? '') }}"
                        class="form-control"
                        placeholder="Ex: Português, Inglês">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="numero_paginas">Número de páginas</label>
                    <input type="number" name="numero_paginas" id="numero_paginas"
                        value="{{ old('numero_paginas', $livro->numero_paginas ?? '') }}"
                        class="form-control"
                        placeholder="Ex: 300">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="edicao">Edição</label>
                    <input type="text" name="edicao" id="edicao"
                        value="{{ old('edicao', $livro->edicao ?? '') }}"
                        class="form-control"
                        placeholder="Ex: 2ª edição">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" id="isbn"
                        value="{{ old('isbn', $livro->isbn ?? '') }}"
                        class="form-control"
                        placeholder="Digite o ISBN">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="resumo">Resumo</label>
                    <textarea name="resumo" id="resumo"
                        class="form-control" rows="4"
                        placeholder="Resumo do livro">{{ old('resumo', $livro->resumo ?? '') }}</textarea>
                </div>
            </div>
        </div>

    </fieldset>

    <div class="row">
        <div class="col-md-4">
            <button class="btn btn-primary" type="submit">Salvar</button>
        </div>
    </div>
</div>