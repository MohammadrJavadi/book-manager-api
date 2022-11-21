@props([
    "target", "content"
])
<!-- Button trigger modal -->
<button type="button" data-bs-toggle="modal" data-bs-target="#{{ $target }}Modal" {{ $attributes->only(["class", "id"]) }}>
    {{ $content }}
</button>
