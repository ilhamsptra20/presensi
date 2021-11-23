@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
      <h4 class="card-title"> Simple Table</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class=" text-primary">
            <th>Date</th>
            <th>Arrival</th>
            <th>Go Home</th>
            <th class="text-right">Description</th>
          </thead>
          <tbody>
                @foreach ($absents as $absent)
                <tr>
                    <td>{{ $absent->date }}</td>
                    <td>{{ $absent->arrival_time ?? '--:--:--' }}</td>
                    <td>{{ $absent->go_home_time ?? '--:--:--' }}</td>
                    <td class="text-right">{{ $absent->description }}</td>
                </tr>
                @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endsection