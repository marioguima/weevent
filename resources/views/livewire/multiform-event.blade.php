<div class="row m-0 p-0">
  <div class="col m-0 p-0">

    <ul class="nav nav-pills nav-tabs-custom nav-justified mt-n3" role="tablist">
      <li class="nav-item mr-1 mr-sm-3 d-flex flex-column align-items-center">
        <a class="nav-link @if ($step == 0) active show @endif" wire:click="jumpToStep(0)" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false"><i class="far fa-file-video"></i></a>

        <span class="label-step d-none d-sm-block">Informação</span>
      </li>

      <li class="nav-item mr-1 mr-sm-3 d-flex flex-column align-items-center">
        <a class="nav-link @if ($step == 1) active show @endif" wire:click="jumpToStep(1)" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-chalkboard-teacher"></i></a>
        <span class="label-step d-none d-sm-block">Apresentadores</span>
      </li>

      <li class="nav-item d-flex flex-column align-items-center">
        <a class="nav-link @if ($step == 2) active show @endif" wire:click="jumpToStep(2)" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true"><i class="far fa-calendar-alt"></i></a>
        <span class="label-step d-none d-sm-block">Programação</span>
      </li>
    </ul>


    {{-- <form id="frmEvent" method="POST" action="{{ route('event.store') }}">
    @csrf --}}
    <form wire:submit.prevent="submit" style="margin-top: 7px;">

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade @if ($step == 0) active show @endif" id="home" role="tabpanel" aria-labelledby="home-tab">
          {{-- Evento --}}
          <div class="card @if ($step == 0 && $steps_active_session[0] != 'basic') collapsed-card @endif" id="cardStep_0_Basic" card-default>
            <div class="card-header">
              <h3 class="card-title">Básica</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas @if ($step == 0 && $steps_active_session[0] != 'basic') fa-plus @else fa-minus @endif"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: @if ($step == 0 && $steps_active_session[0] != 'basic') none; @else block; @endif">
              <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group label-floating is-empty">
                    <label>{{ trans('adminlte::weevent.title_of_event') }}</label>
                    <input wire:model.lazy="title" type="text" class="form-control" placeholder="Informe o título ...">
                    @error('title')<small class="form-text text-danger">{{ $message }}</small>@enderror
                  </div>
                </div>
              </div>
              <div class="row">

                {{-- video platform --}}
                <div class="col-md-5 col-lg-4">
                  <div class="form-group">
                    <label for="">{{ trans('adminlte::weevent.video_platform') }}</label><br />
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-info @if($video_platform=='youtube' ) active @endif">
                        <input type="radio" wire:click="changeVideoPlatform('youtube')" name="video_platform" id="youtube" value="youtube" autocomplete="off" checked> Youtube
                      </label>
                      <label class="btn btn-info @if($video_platform=='vimeo' ) active @endif">
                        <input type="radio" wire:click="changeVideoPlatform('vimeo')" name="video_platform" id="vimeo" value="vimeo" autocomplete="off"> Vimeo
                      </label>
                      <label class="btn btn-info @if($video_platform=='wistia' ) active @endif">
                        <input type="radio" wire:click="changeVideoPlatform('wistia')" name="video_platform" id="youtube" value="wistia" autocomplete="off"> Wistia
                      </label>
                    </div>
                  </div>
                </div>

                {{-- video id --}}
                <div class="col-md-7 col-lg-8">
                  <div class="form-group">
                    <label>{{ trans('adminlte::weevent.platform_video_id', ['platform' => $video_platform]) }}</label>
                    <input wire:model.lazy="video_id" type="text" class="form-control" placeholder="Identificador do vídeo ...">
                    @error('video_id')<small class="form-text text-danger">{{ $message }}</small>@enderror
                  </div>
                </div>

              </div>
            </div>
            <!-- /.card-body -->
          </div>

          {{-- Apresentadores --}}
          <div class="card @if ($step == 0 && $steps_active_session[0] != 'participants') collapsed-card @endif" id="cardStep_0_Participants">
            <div class="card-header">
              <h3 class="card-title">Apresentadores e colaboradores</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas @if ($step == 0 && $steps_active_session[0] != 'participants') fa-plus @else fa-minus @endif"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: @if ($step == 0 && $steps_active_session[0] != 'participants') none; @else block; @endif">

              {{-- cabeçalho --}}
              <div class="row mb-1">

                {{-- full name --}}
                <div class="col-sm-3">
                  <label>{{ trans('adminlte::weevent.full_name') }}</label>
                </div>

                {{-- email --}}
                <div class="col-sm-4">
                  <label>{{ trans('adminlte::weevent.email') }}</label>
                </div>

                {{-- role --}}
                <div class="col-sm-3">
                  <label>{{ trans('adminlte::weevent.role') }}</label>
                </div>

                {{-- photo --}}
                <div class="col-sm-1">
                  <label>{{ trans('adminlte::weevent.photo') }}</label>
                </div>

                {{-- remove --}}
                <div class="col-sm-1">
                </div>

              </div>

              {{-- participants --}}
              <div class="row">

                @foreach ($participants as $i => $participant)

                {{-- full name --}}
                <div class="col-sm-3">
                  <div class="form-group">
                    <input type="text" wire:model.lazy="participants.{{ $i }}.full_name" class="form-control" placeholder="{{ @trans('adminlte::weevent.full_name_placeholder') }} ...">
                    @error("participants.{$i}.full_name")<small class="form-text text-danger">{{ $errors->first("participants.{$i}.full_name") }}</small>@enderror
                  </div>
                </div>

                {{-- email --}}
                <div class="col-sm-4">
                  <div class="form-group">
                    <input type="text" wire:model.lazy="participants.{{ $i }}.email" class="form-control" placeholder="{{ @trans('adminlte::weevent.email_placeholder') }} ...">
                    @error("participants.{$i}.email")<small class="form-text text-danger">{{ $errors->first("participants.{$i}.email") }}</small>@enderror
                  </div>
                </div>

                {{-- role --}}
                <div class="col-sm-3">
                  <div class="form-group">
                    <input type="text" wire:model.lazy="participants.{{ $i }}.role" class="form-control" placeholder="{{ @trans('adminlte::weevent.role_placeholder') }} ...">
                    @error("participants.{$i}.role")<small class="form-text text-danger">{{ $errors->first("participants.{$i}.role") }}</small>@enderror
                  </div>
                </div>

                {{-- photo --}}
                <div class="col-sm-1">
                  <div class="form-group">
                    <input type="text" wire:model.lazy="participants.{{ $i }}.photo" class="form-control">
                    @error("participants.{$i}.photo")<small class="form-text text-danger">{{ $errors->first("participants.{$i}.photo") }}</small>@enderror
                  </div>
                </div>

                {{-- remove --}}
                <div class="col-xs-1">
                  <div class="form-group">
                    <a href="#" wire:click.prevent="removeParticipant({{ $i }})" class="btn p-0 text-danger"><i class="fas fa-trash"></i></a>
                  </div>
                </div>

                @endforeach

              </div>

              @if ($this->canAddMoreParticipants())
              <div class="row">
                <div class="col">
                  <div wire:click.prevent="addParticipant" class="btn btn-secondary mr-4">
                    Add participant
                  </div>
                </div>
              </div>
              @endif

            </div>
            <!-- /.card-body -->
          </div>

        </div>
        <div class="tab-pane fade @if ($step == 1) active show @endif" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation
            +1
            labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft
            beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
            vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar
            helvetica
            VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson
            8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party
            scenester
            stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
        </div>
        <div class="tab-pane fade @if ($step == 2) active show @endif" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro
            fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone
            skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings
            gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork
            biodiesel
            fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer
            blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
        </div>
      </div>

      <div>

        @if ($step > 0 && $step <= 2) <button type="button" wire:click="decreaseStep" class="btn btn-secondary mr-3">Back</button>
          @endif

          @if ($step <= 2) <button type="button" wire:click="next" class="btn btn-info">Next</button>
            @endif
            {{-- @if ($step <= 2) <button type="submit" class="btn btn-info">Next</button>
            @endif --}}

      </div>
    </form>


  </div>
</div>

{{--
  @if (session()->has('message'))
    <div class="alert alert-success">
      {{ session('message') }}
</div>
@endif

<form wire:submit.prevent="submit">

  <div>

    @if ($step == 0)
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" wire:model.lazy="name" placeholder="Name">

      @error('name')<small class="form-text text-danger">{{ $message }}</small>@enderror

      <label for="email">Email</label>
      <input type="email" class="form-control" wire:model.lazy="email" placeholder="email">

      @error('email')<small class="form-text text-danger">{{ $message }}</small>@enderror
    </div>

    @endif

    @if ($step == 1)
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" wire:model.lazy="email" placeholder="email">

      @error('email')<small class="form-text text-danger">{{ $message }}</small>@enderror
    </div>
    @endif

    @if ($step == 2)
    <div class="form-group">
      <label for="color">Favorite color</label>
      <input type="text" class="form-control" wire:model.lazy="color" placeholder="Favorite color">

      @error('color')<small class="form-text text-danger">{{ $message }}</small>@enderror
    </div>
    @endif

    @if ($step > 2)
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thank you for information</h4>
        <p class="card-text">Welcome to webdevmatics {{ $this->name }}. Happy learning and
          Subscribe!</p>
        <a href="/">Go to home</a>
      </div>
    </div>
    @endif
  </div>

  <div class="mt-2">

    @if ($step > 0 && $step <= 2) <button type="button" wire:click="decreaseStep" class="btn btn-secondary mr-3">Back</button>
      @endif

      @if ($step <= 2) <button type="submit" class="btn btn-success">Next</button>
        @endif

  </div>

</form> --}}

<style>
  .label-step {
    color: #9e9e9e;
    font-size: 1rem;
  }

  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #26bdde;
  }

  .nav-pills .nav-link:not(.active):hover {
    color: #9e9e9e;
  }

  .nav-tabs-custom .nav-link {
    border-radius: 100%;
    width: 3.125rem;
    height: 3.125rem;
    text-align: center;
    display: -webkit-box;
    display: flex;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
    background: #fff;
    color: #9e9e9e;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 6px 0 rgba(0, 0, 0, .025);
    position: relative;
    font-size: 1.3125rem;
    line-height: 0.5;
  }

  .nav-tabs-custom .nav-link.active:before {
    -webkit-transition: opacity .3s ease-in-out;
    transition: opacity .3s ease-in-out;
    border-radius: 100%;
    content: "";
    width: 3.5rem;
    height: 3.5rem;
    position: absolute;
    top: -.25rem;
    left: -.25rem;
    border-width: .25rem;
    border-style: solid;
    box-shadow: 0 0 10px 5px rgba(0, 0, 0, .075);
    opacity: 1;
    border-color: #fff;
  }

  /* segundo */
  .nav-tabs-custom .nav-item {
    position: relative;
  }

  .nav-justified .nav-item {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -ms-flex-positive: 1;
    flex-grow: 1;
    text-align: center;
  }

  .nav-tabs .nav-item {
    margin-bottom: -1px;
  }

  .nav-tabs .nav-item.show .nav-link,
  .nav-tabs .nav-link.active {
    color: #495057;
    background-color: #fff;
    border-color: #dee2e6 #dee2e6 #fff;
  }

  .nav-tabs .nav-link,
  .nav-pills .nav-link {
    font-family: "Roboto", sans-serif;
    color: #1d1e3a;
    font-size: 14px;
  }

  .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
  }

  .nav-tabs-custom>li>a {
    color: #1d1e3a;
  }

  .nav-link {
    display: block;
    padding: .5rem 1rem;
  }

  .nav-tabs-custom>li:hover:after {
    -webkit-transform: scale(1);
    transform: scale(1);
  }

  .nav-tabs-custom>li:after {
    content: "";
    background: #7fd3ec;
    height: 2px;
    position: absolute;
    width: 100%;
    left: 0;
    bottom: -7px;
    -webkit-transition: all 250ms ease 0s;
    transition: all 250ms ease 0s;
    -webkit-transform: scale(0);
    transform: scale(0);
  }

</style>

@push('js')
<script>
  $(document).ready(function() {
    $('#cardStep_0_Basic, #cardStep_0_Participants').on('collapsed.lte.cardwidget', function() {
      //   Livewire.emit('activeSession', ['session' => '']);
      window.livewire.emit('activeSession', '');
    })

    $('#cardStep_0_Basic').on('expanded.lte.cardwidget', function() {
      $('#cardStep_0_Participants').CardWidget('collapse');
      window.livewire.emit('activeSession', 'basic');
      //   Livewire.emit('activeSession', ['session' => 'basic']);
    })

    $('#cardStep_0_Participants').on('expanded.lte.cardwidget', function() {
      $('#cardStep_0_Basic').CardWidget('collapse');
      window.livewire.emit('activeSession', 'participants');
      //   Livewire.emit('activeSession', ['session' => 'participants']);
    })

  });

</script>

{{-- console log --}}
<script>
  let logComponentsData = function() {
    Livewire.components.components().forEach(component => {
      console.log("%cComponent: " + component.name, "font-weight:bold");
      console.log(component.data);
    });
  };

  document.addEventListener("livewire:load", function(event) {
    logComponentsData();

    Livewire.hook('message.processed', (message, component) => {
      logComponentsData();
    });
  });

</script>
@endpush
