<template>
  <Menu as="div" class="relative inline-block text-left">
    <MenuButton class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-black rounded-md bg-opacity-20 hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">{{ props.username }}</MenuButton>
    <transition
        enter-active-class="transition duration-100 ease-out"
        enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100"
        leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100"
        leave-to-class="transform scale-95 opacity-0"
      >
    <MenuItems class="absolute right-0 w-56 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
    <div class="px-1 py-1">
      <MenuItem v-slot="{ active }">
        <router-link :class='{ "bg-pink-500": active }' class="group flex rounded-md items-center w-full px-2 py-2 text-sm" to="settings">
          settings
        </router-link>
      </MenuItem>
    </div>
    <div class="px-1 py-1">
      <MenuItem v-slot="{ active }">
        <form :class='{ "hover:bg-pink-500": active }' class="group flex rounded-md items-center w-full px-2 py-2 text-sm" action="http://localhost:8008/logout" method="POST">
          <input type="hidden" name="_token" :value="props.csrf">
          <button type="submit">logout</button>
        </form>
      </MenuItem>
    </div>
    </MenuItems>
    </transition>
  </Menu>
</template>

<script>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'


export default {
  props: ['csrf', 'username'],
  components: {
    Menu,
    MenuButton,
    MenuItems,
    MenuItem,
  },
  setup(props){
    console.log(props.csrf);
    return{
      props,
    }
  }
}
</script>
