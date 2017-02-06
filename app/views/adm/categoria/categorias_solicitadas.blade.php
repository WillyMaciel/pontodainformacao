@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li class="active">Categorias Solicitadas</li>
</ul>
<!-- END BREADCRUMB -->                

<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
    <form method="post">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="panel-title">Categorias Solicitadas</h3>
                </div>
                <div class="col-md-1">Marcar Como:</div>
                <div class="col-md-2">
                    <select name="status" class="form-control">
                        <option value="0">Não visualizado</option>
                        <option value="1">Visualizado</option>
                        <option value="2">Incluído</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <input type="submit" class="btn btn-primary btn-lg active" value="salvar"/>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome Categoria</th>
                        <th>Observação</th>
                        <th>Status</th>
                        <th>Data de Criação</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($categoriasSolicitadas) && !$categoriasSolicitadas->isEmpty())
                        @foreach($categoriasSolicitadas AS $categoriasSolicitada)
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="checkbox" name="categoriasSolicitadas[]" value="{{ $categoriasSolicitada->id }}" />
                                        </div>
                                        <div class="col-md-10">{{$categoriasSolicitada->nome_categoria}}</div>
                                    </div>
                                </td>
                                <td>{{$categoriasSolicitada->observacao}}</td>
                                <td>
                                @if($categoriasSolicitada->status == 1)
                                    <span class="fa fa-eye"></span> Visualizado
                                @elseif($categoriasSolicitada->status == 2)
                                    <span class="fa fa-thumbs-o-up"></span> Incluído
                                @else
                                    <span class="fa fa-eye-slash"></span> Não visualizado
                                @endif
                                </td>
                                <td>{{Formatter::getDataHoraFormatada($categoriasSolicitada->created_at)}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>Nenhuma Rua Cadastrada no sistema</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </form>
</div>
<!-- END DEFAULT DATATABLE -->
@stop