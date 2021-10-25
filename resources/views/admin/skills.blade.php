@extends('layouts.nonindex')
@section('title', 'Skills')
@section('content')

<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%">
  <h3 class="w3-bar-item">Menu</h3>
  <a href="{{route('dboard')}}" class="w3-bar-item w3-button">Dashboard</a>
  <a href="{{route('skillz_show')}}" class="w3-bar-item w3-button w3-green">Skills</a>
  <a href="{{route('dbio')}}" class="w3-bar-item w3-button">My Bio</a>
  <a href="{{route('skille_view', auth()->user()->id)}}" class="w3-bar-item w3-button">My Skills</a>
</div>

<div style="margin-left:15%">

<div class="w3-container w3-teal">
  <h1>Skills</h1>
</div>
<div class="w3-content">
<h3>Skills:</h3>
<table class="w3-table w3-light-grey">
  @foreach ($skillz as $skill)
        <tr>
            <td>{{ $skill->title }}</td>
            <td>
                    <form action="{{ route('skillz_destroy',$skill->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form> 
            </td>
        </tr>
 @endforeach    
</table>
</div>

<div class="w3-content w3-margin-top">
<form class="w3-container w3-card-4 w3-light-grey" action="{{ route('skillz_store') }}" method="POST">
    @csrf
  
  <label>Add New Skill</label>
  <input class="w3-input w3-border-0" type="text" name="title"></p>

  <button class="w3-button w3-round-xlarge w3-blue" type="submit">Submit</button> <br>
  
</form>
    @if ($errors->any())
    <div class="w3-panel w3-red w3-display-container">
    <span onclick="this.parentElement.style.display='none'"
    class="w3-button w3-large w3-display-topright">&times;</span>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </div>
    @enderror

</div>

</div>


@endsection