@extends('layouts.adminNavigation')
@section('title', $title)
@section('maintab')
<div class="mainTabs pe-0 m-0">
    <div class="row" style="border-bottom: 1px solid; padding-block: 10px; margin-bottom: 10px;">
        <div class="col text-start" style="font-family: 'Inter',sans-serif; font-weight: bold; font-size: 1.5em;">
            VIEW REQUESTS
        </div>
    </div>
    <div style="width: 90%;">
       
<form action="{{ route('request.submit') }}" method="POST" class="px-4">
                @csrf
                <!-- Requesting Party -->
                <div class="mb-3">
                    <label for="requestingParty" class="form-label fw-bold">Requesting Party:</label>
                    <input type="text" id="requestingParty" name="requesting_party" 
                           class="form-control @error('requesting_party') is-invalid @enderror" 
                           value="{{$data->requesting_party}}" disabled required>
                    @error('requesting_party')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Mobile Number -->
                <div class="mb-3">
                    <label for="mobileNumber" class="form-label fw-bold">Mobile Number:</label>
                    <input type="tel" id="mobileNumber" name="mobile_number" 
                           class="form-control @error('mobile_number') is-invalid @enderror" 
                           value="{{$data->mobile_number}}" disabled required>
                    @error('mobile_number')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="emailAddress" class="form-label fw-bold">Email Address:</label>
                    <input type="email" id="emailAddress" name="email_address" 
                           class="form-control @error('email_address') is-invalid @enderror" 
                           value="{{$data->email_address}}" disabled required>
                    @error('email_address')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Activity Title -->
                <div class="mb-3">
                    <label for="activityTitle" class="form-label fw-bold">Activity Title:</label>
                    <input type="text" id="activityTitle" name="activity_title" 
                           class="form-control @error('activity_title') is-invalid @enderror" 
                           value="{{$data->activity_title}}" disabled required>
                    @error('activity_title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Type of Coverage -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Type of Coverage:</label>
                    <div class="d-flex justify-content-around">
                        @foreach (['Interview', 'Event Coverage', 'Photo Documentation', 'Social Media Publication', 'Multimedia Coverage', 'Others'] as $coverageType)
                            <div class="form-check">
                                <input class="form-check-input @error('coverage') is-invalid @enderror" 
                                       type="radio" id="{{ strtolower(str_replace(' ', '_', $coverageType)) }}" 
                                       name="coverage" value="{{ $coverageType }}" 
                                       disabled
                                       {{ $data->coverage == $coverageType ? 'checked' : '' }} required>
                                <label class="form-check-label" for="{{ strtolower(str_replace(' ', '_', $coverageType)) }}">
                                    {{ $coverageType }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('coverage')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Event Description -->
                <div class="mb-3">
                    <label for="eventDescription" class="form-label fw-bold">Event Description:</label>
                    <textarea id="eventDescription" name="event_description" 
                              class="form-control @error('event_description') is-invalid @enderror" 
                              rows="3" required disabled>{{$data->event_description}}</textarea>
                    @error('event_description')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Program Highlights -->
                <div class="mb-3">
                    <label for="programHighlights" class="form-label fw-bold">Program Highlights:</label>
                    <textarea id="programHighlights" name="program_highlights" 
                              class="form-control @error('program_highlights') is-invalid @enderror" 
                              rows="3" required disabled>{{$data->program_highlights}}</textarea>
                    @error('program_highlights')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Date, Time, Venue -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="date" class="form-label fw-bold">Date:</label>
                        <input type="date" id="date" name="date" 
                               class="form-control @error('date') is-invalid @enderror" 
                               value="{{$data->date}}" disabled required>
                        @error('date')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="time" class="form-label fw-bold">Time:</label>
                        <input type="time" id="time" name="time" 
                               class="form-control @error('time') is-invalid @enderror" 
                               value="{{$data->time}}" disabled required>
                        @error('time')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="venue" class="form-label fw-bold">Venue:</label>
                        <input type="text" id="venue" name="venue" 
                               class="form-control @error('venue') is-invalid @enderror" 
                               value="{{$data->venue}}" disabled required>
                        @error('venue')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Notes -->
                <div class="mb-3">
                    <label for="notes" class="form-label fw-bold">Notes:</label>
                    <textarea id="notes" name="notes" class="form-control" disabled>{{$data->notes}}</textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-end">
                    <!-- <button type="submit" class="btn btn-primary">Submit Request</button> -->
                </div>
            </form>
    </div>
</div>
@endsection