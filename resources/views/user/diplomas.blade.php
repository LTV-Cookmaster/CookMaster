<!DOCTYPE html>
<html lang="fr">
@section('title' , __('diplomas.title'))
@php
    use Carbon\Carbon;

@endphp
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
    </head>
@include('layouts.navbar')

@if(session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show text-center d-flex align-items-center justify-content-between" role="alert">
        <span style="flex-grow: 1; text-align: center;">{{ session('success') }}</span>
        <p id="close-success" type="button" class="m-0">
            <i class="fa-solid fa-xmark"></i>
        </p>
    </div>
@endif

@if(session('error'))
    <div id="error-alert" class="alert alert-danger alert-dismissible fade show text-center d-flex align-items-center justify-content-between" role="alert">
        <span style="flex-grow: 1; text-align: center;">{{ session('error') }}</span>
        <p id="close-error" type="button" class="m-0">
            <i class="fa-solid fa-xmark"></i>
        </p>
    </div>
@endif

<script>
    if (document.getElementById('close-success')) {
        document.getElementById('close-success').addEventListener('click', function() {
            document.getElementById('success-alert').remove();
        });
    }

    if (document.getElementById('close-error')) {
        document.getElementById('close-error').addEventListener('click', function() {
            document.getElementById('error-alert').remove();
        });
    }
</script>

    <body>
    <br>
    <div class="container">
        <section class="mb-5">
            <h2>{{__('diplomas.title')}}</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>{{ __('diplomas.name') }}</th>
                    <th>{{ __('diplomas.date') }}</th>
                    <th>{{ __('diplomas.score') }}</th>
                    <th>{{ __('diplomas.read_again') }}</th>
                    <th>{{ __('diplomas.download') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($diplomas as $diploma)
                    <tr>
                        <td>{{ $diploma->diploma_name }}</td>
                        @php
                            $date = Carbon::createFromFormat('Y-m-d H:i:s', $diploma->created_at);
                            $formattedDate = $date->format('F jS Y \a\t H\hi');
                        @endphp
                        <td>{{ $formattedDate }}</td>
                        <td style="color: green">{{ $diploma->score }}/5</td>
                        <td>
                            <a href="{{ route('courses.index', ['course_id' => $diploma->formation_id]) }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i> {{__('Revoir')}}</a>
                        </td>
                        <td>
                            <a href="{{ route('downloadDiploma', ['formation_id' => $diploma->formation_id]) }}" class="btn btn-outline-primary"><i class="fa-solid fa-download"></i> {{__('Télécharger mon diplome')}}</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('layouts.footer')
</body>

</html>
