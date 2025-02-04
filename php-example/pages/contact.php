<?php
include 'database/config.php';
include 'components/header.php';
?>
<div class="p-4 mx-auto max-w-xl bg-white font-[sans-serif]">
      <h1 class="text-2xl text-gray-800 font-bold text-center">Contact us</h1>
      <form class="mt-8 space-y-4">
        <input type='text' placeholder='Name'
          class="w-full py-2.5 px-4 text-gray-800 bg-gray-100 border focus:border-black focus:bg-transparent text-sm outline-none transition-all" />
        <input type='email' placeholder='Email'
          class="w-full py-2.5 px-4 text-gray-800 bg-gray-100 border focus:border-black focus:bg-transparent text-sm outline-none transition-all" />
        <input type='text' placeholder='Subject'
          class="w-full py-2.5 px-4 text-gray-800 bg-gray-100 border focus:border-black focus:bg-transparent text-sm outline-none transition-all" />
        <textarea placeholder='Message' rows="4"
          class="w-full px-4 text-gray-800 bg-gray-100 border focus:border-black focus:bg-transparent text-sm pt-3 outline-none transition-all"></textarea>
        <button type='button'
          class="text-white bg-black hover:bg-gray-900 tracking-wide text-sm px-4 py-2.5 w-full outline-none">Send</button>
      </form>
    </div>
<?php
include 'components/footer.php';
?>