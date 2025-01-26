<x-vue-layout>
    <user-register
        :user="{{ json_encode($user) }}"
        :countries="{{ json_encode($countries) }}"
    ></user-register>
</x-vue-layout>
|
