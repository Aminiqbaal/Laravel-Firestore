<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Curriculum Vitae</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cv.css') }}">
</head>
<body>
    <div class="main">
        <div class="row">
            <div class="col-5">
                <div class="general">
                    <div class="photo"><img src="{{ asset('assets/foto.jpg') }}" alt="foto"></div>
                    <div class="name">{{ $data['name'] }}</div>
                    <div class="specialist">{{ $data['specialization'] }}</div>
                </div>
                <div class="detail">
                    <div class="section-title">PROFIL</div>
                    <p>{!! $data['profile'] !!}</p>
                    <div class="section-title">INFORMASI KONTAK</div>
                    <table class="contact">
                        <tr>
                            <th>Telepon</th>
                            <td>{{ $data['phone'] }}</td>
                        </tr>
                        <tr>
                            <th>Whatsapp</th>
                            <td>{{ $data['whatsapp'] }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $data['email'] }}</td>
                        </tr>
                        <tr>
                            <th style="vertical-align: top;">Alamat</th>
                            <td>{!! $data['address'] !!}</td>
                        </tr>
                    </table>
                    <div class="section-title">SOFT SKILL</div>
                    <ul>
                        @foreach (explode('|', $data['skills']) as $skill)
                        <li>{{ ucwords(trim($skill)) }}</li>
                        @endforeach
                    </ul>
                    <div class="section-title">PORTOFOLIO</div>
                    <p>{{ $data['portofolio'] }}</p>
                </div>
            </div>
            <div class="col-7 right-side">
                @if ($data['education'])
                <div class="section-title">PENDIDIKAN</div>
                <table class="list">
                    @foreach (explode('|', $data['education']) as $education)
                    @php $education = explode('_', $education) @endphp
                    <tr>
                        <th class="year" rowspan="2">{{ trim($education[0]) }}</th>
                        <th>{{ trim($education[1]) }}</th>
                    </tr>
                    @if (count($education) == 3)
                    <tr>
                        <td>{{ trim($education[2]) }}</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
                @endif
                @if ($data['organization'])
                <div class="section-title">PENGALAMAN ORGANISASI</div>
                <table class="list">
                    @foreach (explode('|', $data['organization']) as $organization)
                    @php $organization = explode('_', $organization) @endphp
                    <tr>
                        <th class="year" rowspan="2">{{ trim($organization[0]) }}</th>
                        <th>{{ trim($organization[1]) }}</th>
                    </tr>
                    @if (count($organization) == 3)
                    <tr>
                        <td>{{ trim($organization[2]) }}</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
                @endif
                @if ($data['committee'])
                <div class="section-title">PENGALAMAN KEPANITIAAN</div>
                <table class="list">
                    @foreach (explode('|', $data['committee']) as $committee)
                    @php $committee = explode('_', $committee) @endphp
                    <tr>
                        <th class="year" rowspan="2">{{ trim($committee[0]) }}</th>
                        <th>{{ trim($committee[1]) }}</th>
                    </tr>
                    @if (count($committee) == 3)
                    <tr>
                        <td>{{ trim($committee[2]) }}</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
                @endif
                @if ($data['appreciation'])
                <div class="section-title">PENGHARGAAN</div>
                <table class="list">
                    @foreach (explode('|', $data['appreciation']) as $appreciation)
                    @php $appreciation = explode('_', $appreciation) @endphp
                    <tr>
                        <th class="year" rowspan="2">{{ trim($appreciation[0]) }}</th>
                        <th>{{ trim($appreciation[1]) }}</th>
                    </tr>
                    @if (count($appreciation) == 3)
                    <tr>
                        <td>{{ trim($appreciation[2]) }}</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
