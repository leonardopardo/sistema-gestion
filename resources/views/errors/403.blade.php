@extends('errors::minimal')

@section('title', __('Sin Acceso'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'No tiene acceso a esta pantalla, vuelva para atras. Si considera que es un error por favor contate con los administradores'))
