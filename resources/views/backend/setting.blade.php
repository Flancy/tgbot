@extends('backend.layouts.app')

@section('content')

<div class="container">
	@if (Session::has('status'))
		<div class="alert alert-info">
			<span>{{ Session::get('status') }}</span>
			<span>{{ Session::get('url') }}</span>
		</div>
	@endif
	<form action="{{ route('admin.setting.store') }}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label>Url callback для TelegramBot</label>
			<div class="input-group">
				<div class="input-group-btn">
					<button type="button" id="dropdownSetting" class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Действие <span class="caret"></span></button>
					<div class="dropdown-menu">
						<a href="#" class="dropdown-item" onclick="document.getElementById('url_callback_bot').value= '{{ url('') }}' ">Вставить url</a>
						<a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('setWebhook').submit()">Отправить url</a>
						<a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('getWebhookInfo').submit()">Получить информацию</a>
					</div>
				</div>
				<input type="url" class="form-control" id="url_callback_bot" name="url_callback_bot" value="{{ $url_callback_bot ?? '' }}">
			</div>
		</div>

		<button class="btn btn-primary" type="submit">Сохранить</button>
	</form>

	<form action="{{ route('admin.setting.setWebhook') }}" id="setWebhook" method="post" style="display: none">
		{{ csrf_field() }}
		<input type="hidden" name="url" value="{{ $url_callback_bot ?? '' }}">
	</form>

	<form action="{{ route('admin.setting.getWebhookInfo') }}" id="getWebhookInfo" method="post" style="display: none">
		{{ csrf_field() }}
		<input type="hidden" name="url" value="{{ $url_callback_bot ?? '' }}">
	</form>
</div>

@endsection