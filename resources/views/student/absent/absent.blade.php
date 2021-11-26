@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mx-auto">
                    <h3 class="my-0">Absent <b>{{ date('l, d F Y') }}</b></h3>
                </div>
                <hr class="m-0">
                <div class="card-body">
                    @if ($today == null || $today->description == 'Masuk')
                        @if ($now >= $arrival )
                        
                            {{-- Pulang --}}
                            @if ($now >= $homeTime)
                                <form action="go-home/{{ $today->id }}" method="POST">
                                <input type="hidden" name="go_home_time" value="{{ $now }}">
                                @method('put')
                                <input type="hidden" name="description" value="Masuk - Pulang">

                            {{-- Tidak Hadir --}}
                            @elseif ($today == null && $now >= $notPresent)
                                <form action="arrival" method="POST">
                                <input type="hidden" name="description" value="Tidak Hadir">
                                <h3>Lu Telat Goblok!!</h3>            
                            
                            {{-- Masuk --}}
                            @elseif ($today == null && $now >= $timeAbsent)
                                <form action="arrival" method="POST">
                                <input type="hidden" name="description" value="Masuk">
                                <input type="hidden" name="arrival_time" value="{{ $now }}">
                        @endif
                            @csrf
                            <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
                            <input type="hidden" name="nis" value="{{ Auth::user()->nis }}">
                            
                            @if ($today != null || $now <= $notPresent)
                            <div class="d-flex justify-content-between w-50 mx-auto">
                                <h5>Arrival Time</h5>
                                <h5>:</h5>
                                <h5>{{ $today->arrival_time ?? date('h : m A' ) }}</h5>
                            </div>
                            <div class="d-flex justify-content-between w-50 mx-auto">
                                <h5>Home Time</h5>
                                <h5>:</h5>
                                <h5>{{$homeTime <= $now ? date('h : m A' ) : '--- : --- ---'}}</h5>
                            </div>
                            @endif

                            <div class="d-flex justify-content-between w-50 mx-auto">
                                <button type="submit" class="btn btn-primary py-1 w-100" {{ $today != null && $now <= $homeTime ? 'disabled' : '' }}><h5 class="m-0">Submit</h5></button>
                            </div>
                            </form>
                        @else
                        <h4 class="text-center">Anda kepagian slurr</h4>                        
                        @endif
                    @elseif( $today->description == 'Masuk - Pulang' )
                        <div class="d-flex justify-content-between w-50 mx-auto">
                            <h5>Arrival Time</h5>
                            <h5>:</h5>
                            <h5>{{ $today->arrival_time }}</h5>
                        </div>
                        <div class="d-flex justify-content-between w-50 mx-auto">
                            <h5>Home Time</h5>
                            <h5>:</h5>
                            <h5>{{ $today->go_home_time }}</h5>
                        </div>
                    
                    @elseif( $today->description == 'Tidak Hadir' )
                        Telat si Tolol mah
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection