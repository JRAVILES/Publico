@include("layouts.formtop")

<div class="row">
    <div class="col-md-12">
        <div class="col-md-2 col-sm-2 bhoechie-tab-menu">
            <div class="tab-menu list-group">
                <a href="#" class="list-group-item active text-center">
                    <i class="fa fa-cog fa-3x"></i><br/>Detalhes
                </a>
                <a href="#" class="list-group-item text-center">
                    <i class="fa fa-bell-o fa-3x"></i><br/>Estoque
                </a>
                <a href="#" class="list-group-item text-center">
                    <i class="fa fa-list fa-3x"></i><br/>Agrupamento
                </a>
                <a href="#" class="list-group-item text-center">
                    <i class="fa fa-money fa-3x"></i><br/>Tributação
                </a>
                <a href="#" class="list-group-item text-center">
                    <i class="fa fa-comment-o fa-3x"></i><br/>Observações
                </a>
            </div>
        </div>
        <div class="col-md-10 col-sm-10 bhoechie-tab">
            <div class="bhoechie-tab-content active">
                <h3><i class="fa fa-cog"></i> Detalhes </h3>
                <hr>

                @include("produtos.abas.detalhes")

            </div>
            <div class="bhoechie-tab-content">
                <h3><i class="fa fa-bell"></i> Estoque </h3>
                <hr>

                @include("produtos.abas.estoque")

            </div>
            <div class="bhoechie-tab-content">
                <h3><i class="fa fa-list"></i> Agrupamento </h3>
                <hr>

                @include("produtos.abas.agrupamento")

            </div>
            <div class="bhoechie-tab-content">
                <h3><i class="fa fa-money"></i> Tributação </h3>
                <hr>

                @include("produtos.abas.tributacao")

            </div>
            <div class="bhoechie-tab-content">
                <h3><i class="fa fa-comment-o"></i> Observações </h3>
                <hr>

                @include("produtos.abas.observacoes")

            </div>
        </div>
    </div>
</div>

@include("layouts.formbotton")