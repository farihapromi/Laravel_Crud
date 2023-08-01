@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    <a href="{{ route('home') }}">Home</a>
    <table>
        <thead>
        <th>name</th>
        <th>email</th>
        <th>details</th>
        </thead>
        <tbody>
        @foreach($profile as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->details }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
