<div class="card mb-4 bg-transparent special-card rounded-corners">
    <div class="card-body">
        <form method="post" id="frmpost" action="/dreams">
            {{ csrf_field() }}
            <fieldset class="mb-2">
                <legend>Erzahle deinen Traum</legend>
            </fieldset>
            <div class="form-row">
                <div class="col-9">
                    <input type="text" class="form-control" id="dreamer" placeholder="Name">
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox mb-1 mt-1 float-right">
                        <input class="custom-control-input" type="checkbox" id="autoSizingCheck" name="isanonymnous">
                        <label class="custom-control-label" for="autoSizingCheck">
                            Anonym Erzahlen
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <input type="text" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="habgetraumt" rows="3" placeholder="hab getraumt..." name="body"></textarea>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="gridCheck" name="agree">
                    <label class="custom-control-label" for="gridCheck">
                        Ich Erlaube hiermitdie Nutzung meines Traumes online und offline und gehwahrehab getraumt.de eine ubesschrankte Lizenz dafur
                    </label>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="btn btn-outline-primary btnfix rounded-corners">TRAUM SENDEN &nbsp;<span class="fas fa-caret-right fa-2x align-middle"></span></button>
        </form>
    </div>
</div>
