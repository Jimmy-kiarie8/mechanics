@extends('layouts.passport')

@section('content')
{{-- <my-header :user="{{ Auth::user() }}"></my-header> 
<v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center> --}}

        <div class="container">
			<passport-clients></passport-clients>
			<passport-authorized-clients></passport-authorized-clients>
			<passport-personal-access-tokens></passport-personal-access-tokens>
		</div>
        {{-- </v-layout>
    </v-container>
</v-content> --}}
@endsection