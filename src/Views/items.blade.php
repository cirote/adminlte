@extends('layouts.final')

@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Argentina: Lista de excepciones al AEC</h3>
        </div>

        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <th style="width: 4%; text-align: center">#</th>
                        <th style="width: 7%; text-align: center">Código</th>
                        <th style="width: 8%; text-align: center">Arancel Nacional</th>
                        <th>Observaciones</th>
                    </tr>
                    @foreach($items as $item)
                    <tr>
                        <td style="text-align: center">{{ $loop->iteration }}</td>
                        <td style="text-align: center">{{ $item->codigo }}</td>
                        <td style="text-align: center">{{ $item->arancel }}</td>
                        <td style="text-align: left">{{ $item->observaciones->first() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection