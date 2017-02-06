@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li class="active">Solicitações de clientes</li>
</ul>
<!-- END BREADCRUMB -->                

<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
    <form method="post">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="panel-title">Solicitações de Clientes</h3>
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
                    <input type="submit" class="btn btn-primary btn-lg active" value="Atualizar"/>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Usuário</th>
                        <th>Empresa</th>
                        <th>Mensagem</th>
                        <th>Status</th>
                        <th>Data de Solicitação</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($solicitacoes) && !$solicitacoes->isEmpty())
                        @foreach($solicitacoes AS $solicitacao)
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="checkbox" name="solicitacoes[]" value="{{ $solicitacao->id }}" />
                                        </div>
                                        <div class="col-md-10"><a href="{{ URL::to('meusdados/'.$solicitacao->user_id) }}">{{$solicitacao->user->nome}}</a></div>
                                    </div>
                                </td>
                                <td><a href="{{ URL::to('meusdados/'.$solicitacao->user_id) }}">{{$solicitacao->user->company_name}}</a></td>
                                <td>{{$solicitacao->mensagem}}</td>
                                <td>
                                @if($solicitacao->status == 1)
                                    <span class="fa fa-eye"></span> Visualizado
                                @elseif($solicitacao->status == 2)
                                    <span class="fa fa-thumbs-o-up"></span> Incluído
                                @else
                                    <span class="fa fa-eye-slash"></span> Não visualizado
                                @endif
                                </td>
                                <td>{{Formatter::getDataHoraFormatada($solicitacao->created_at)}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>Nenhuma solicitação feita no sistema</td>
                            <td></td>
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