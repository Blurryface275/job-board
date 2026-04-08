<x-mail::message>
# Job Posted!

Congrats! Your job listing **{{ $job->title }}** is now live on our platform.

<x-mail::button :url="url('/jobs/' . $job->id)">
View Job Listing
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>