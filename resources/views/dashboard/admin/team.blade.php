<x-layout :navLinks="$navLinks">

    <section class="w-full">
        <!-- Get a specific query parameter -->
      @if(request("teamloc") === "add")
        <x-adminProjectTeamAdd />
      @else
        <x-adminTeam />
      @endif
    </section>
</x-layout>
