<x-layout :navLinks="$navLinks">

    <section class="w-full">
        <!-- Get a specific query parameter -->
      @if(request("projectloc") === "add")
        <x-adminProjectAdd />
      @elseif(request("projectloc") === "closed")
        <x-adminProjectClose />
      @elseif(request("projectloc") === "expired")
        <x-adminProjectExpired />
      @else
        <x-adminProject />
      @endif
    </section>
</x-layout>
