@extends('base')

@section('page-title')
    Start Page
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js" type="text/javascript"></script>
    <script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>

    <script type="text/javascript">
        $(document).ready(function()
        {
            $("input[name='isanonymnous']").click(function(){
                $("#dreamer").attr('readonly', !$("#dreamer").attr('readonly'));
                if ($(this).is(':checked')) {
                    $( "#dreamer" ).val( "Anonymous" );
                }
                else {
                    $( "#dreamer" ).val( "" );
                }
            });

            $("#errors").hide();

            $("#frmpost").validate({
                ignore: ".ignore",
                errorClass: "error",
                groups: {
                    agree: "agree"
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "agree") {
                        error.insertAfter("#agree-label");
                    } else {
                        error.insertAfter(element);
                    }
                },
                rules:{
                    dreamer:{ required: true , maxlength: 100 },
                    title:{ required: true, maxlength: 255},
                    body:{ required: true, maxlength: 20000},
                    agree: { required: true },
                    "hiddenRecaptcha": {
                        required: function() {
                            if(grecaptcha.getResponse() == '') {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    }
                },
                messages:{
                    dreamer: {
                        required: "Please Enter name of the dreamer.",
                        maxlength: "Name can't be longer than 100 characters."
                    },
                    title: {
                        required: "Please enter the dream title.",
                        maxlength: "Title can't be longer than 255 characters."
                    },
                    body: {
                        required: "Description of dream is required.",
                        maxlength: "Description can't be longer than 20000 characters."
                    },
                    agree: {
                        required: "Accept terms and conditions.",
                    },
                    "hiddenRecaptcha": "The captcha was not validated."
                }
            });
        });
    </script>
@endsection

@section('content')
    <div class="card mb-4 bg-transparent special-card rounded-corners">
        <div class="card-body">
            @if(Session::has('status'))
                <div class="alert alert-success">
                    {{ Session::get('status') }}
                </div>
            @endif
            <form method="post" id="frmpost" action="/">
                {{ csrf_field() }}
                <fieldset class="mb-2">
                    <legend>Erzahle deinen Traum</legend>
                </fieldset>
                <div class="form-row">
                    <div class="col-9">
                        <input type="text" class="form-control" id="dreamer" placeholder="Name" name="dreamer" value="{{ old('dreamer') }}">
                    </div>
                    <div class="col">
                        <div class="custom-control custom-checkbox mb-1 mt-1 float-right">
                            <input class="custom-control-input" type="checkbox" id="autoSizingCheck" name="isanonymnous" @if(old('isanonymnous')) checked @endif >
                            <label class="custom-control-label" for="autoSizingCheck">
                                Anonym Erzahlen
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="habgetraumt" rows="3" placeholder="hab getraumt..." name="body">{{ old('body') }}</textarea>
                </div>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" style="float: left;"></div>
                    <input id="hiddenRecaptcha" type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" />
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="agree" name="agree" @if(old('agree')) checked @endif >
                        <label class="custom-control-label" for="agree" id="agree-label">
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
