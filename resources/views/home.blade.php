@extends('base')

@section('page-title')
    Start Page
@endsection

@section('content')
    <div class="card mb-4 bg-transparent special-card rounded-corners">
        <div class="card-body">
            <form method="post" id="frmpost" action="">
                <fieldset class="mb-2">
                    <legend>Erzahle deinen Traum</legend>
                </fieldset>
                <div class="form-row">
                    <div class="col-9">
                        <input type="text" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="col">
                        <div class="custom-control custom-checkbox mb-1 mt-1 float-right">
                            <input class="custom-control-input" type="checkbox" id="autoSizingCheck">
                            <label class="custom-control-label" for="autoSizingCheck">
                                Anonym Erzahlen
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" id="titel" placeholder="Titel">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="habgetraumt" rows="3" placeholder="hab getraumt..."></textarea>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="gridCheck">
                        <label class="custom-control-label" for="gridCheck">
                            Ich Erlaube hiermitdie Nutzung meines Traumes online und offline und gehwahrehab getraumt.de eine ubesschrankte Lizenz dafur
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary btnfix rounded-corners">TRAUM SENDEN &nbsp;<span class="fas fa-caret-right fa-2x align-middle"></span></button>
            </form>
        </div>
    </div>

    @foreach($dreams as $dream)
        <div class="card mb-4 rounded-corners">
            <div class="card-body">
                <h2 class="card-title"><a href="/dream/{{ $dream->slug }}"><span>{{ $dream->title }}</span></a></h2>
                <p class="card-text">{{ $dream->body }}</p>
                <a href="/dream/{{ $dream->slug }}">alles anzeigen</a>
                <table class="table table-sm text-muted my-0 mt-2">
                    <tr>
                        <td class="px-0 py-0 pt-2">17 mal gelesen</td>
                        <td class="px-0 py-0 pt-2 text-center">2 Kommentare</td>
                        <td class="px-0 py-0 pt-2 text-right">{{ $dream->created_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    @endforeach

@endsection
