<x-layout :navLinks="$navLinks">
    <section class="w-full">
        <!-- Get a specific query parameter -->
      @if(request("projectloc") === "add")
        <x-managerProjectAdd />
      @elseif(request("projectloc") === "closed")
        <x-managerProjectClose />
      @elseif(request("projectloc") === "expired")
        <x-managerProjectExpired />
      @else
        <x-managerProject />
      @endif
    </section>
</x-layout>


