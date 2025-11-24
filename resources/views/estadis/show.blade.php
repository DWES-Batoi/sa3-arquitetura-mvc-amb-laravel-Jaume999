@extends('layouts.app')

@section('title', "Detall d'Estadi")

@section('content')
<x-estadi 
  :nom="$estadi['nom']" 
  :ciutat="$estadi['ciutat']" 
  :aforament="$estadi['aforament']" 
  :equip="$estadi['equip']"
/>
@endsection