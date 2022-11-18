@extends("layouts.master")
@push("title")
    Show book
@endpush
@push("sub-title")
    Show "{{ $book->title }}"
@endpush
