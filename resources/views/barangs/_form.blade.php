    <div class="form-group{{ $errors->has('id_jenis') ? 'has-error' : '' }}">
	{!! Form::label('id_jenis', 'Jenis Barang', ['class'=>'col-md-2 control-label']) !!}
		<div class="col-md-4">
			{!! Form::select('id_jenis', ["=>"]+App\jenis::pluck('nama','id')-> all() , null) !!}
			{!! $errors->first('id_jenis', '<p class="help-block">:message</p>') !!}
		</div>
	</div>

	<div class="form-group{{ $errors->has('nama_barang') ? 'has-error' : '' }}">
	{!! Form::label('nama_barang', 'Nama Barang', ['class'=>'col-md-2 control-label']) !!}
		<div class="col-md-4">
			{!! Form::text('nama_barang', null, ['class'=>'form-control']) !!}
			{!! $errors->first('nama_barang', '<p class="help-block">:message</p>') !!}
		</div>
	</div>

	<div class="form-group{{ $errors->has('amount') ? 'has-error' : '' }}">
	{!! Form::label('amount', 'Stok', ['class'=>'col-md-2 control-label']) !!}
		<div class="col-md-4">
			{!! Form::number('amount', null, ['class'=>'form-control']) !!}
			{!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-4 col-md-offset-2">
			{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>