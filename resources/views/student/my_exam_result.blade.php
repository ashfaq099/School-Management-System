@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Exam Result</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                @foreach($getRecord as $value)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $value['exam_name'] }}</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Class Work</th>
                                        <th>Test Work</th>
                                        <th>Home Work</th>
                                        <th>Exam</th>
                                        <th>Total Score</th>
                                          <th>Grade</th>
                                        <th>Passing Mark</th>
                                        <th>Full Marks</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total_score = 0;
                                    $full_marks = 0;
                                    @endphp
                                    @foreach($value['subject'] as $exam)
                                    @php
                                    $total_score += $exam['total_score'];
                                    $full_marks += $exam['full_marks'];
                                    $percentage = ($exam['total_score'] / $exam['full_marks']) * 100;
                                    $grade = '';

                                    if ($percentage >= 90) {
                                        $grade = 'A+';
                                    } elseif ($percentage >= 80) {
                                        $grade = 'A';
                                    } elseif ($percentage >= 70) {
                                        $grade = 'B';
                                    } elseif ($percentage >= 60) {
                                        $grade = 'C';
                                    } elseif ($percentage >= 50) {
                                        $grade = 'D';
                                    } else {
                                        $grade = 'F';
                                    }
                                    @endphp
                                    <tr>
                                        <td>{{ $exam['subject_name'] }}</td>
                                        <td>{{ $exam['class_work'] }}</td>
                                        <td>{{ $exam['test_work'] }}</td>
                                        <td>{{ $exam['home_work'] }}</td>
                                        <td>{{ $exam['exam'] }}</td>
                                        <td>{{ $exam['total_score'] }}</td>
                                        <td>{{ $grade }}</td>
                                        <td>{{ $exam['passing_mark'] }}</td>
                                        <td>{{ $exam['full_marks'] }}</td>
                                        
                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="2"><b>Grand Total: {{ $total_score }}/{{ $full_marks }}</b></td>
                                        <td colspan="2"><b>Percentage: {{ $percentage }} %</b></td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

</div>
@endsection
