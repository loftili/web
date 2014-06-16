<script type="text/javascript">lft.value('GOOGLE', (function() { 

return {
  redirect_uri: "{{ Config::get('vendor.google.redirect_uri') }}",
  client_id: "{{ Config::get('vendor.google.client_id') }}"
};
  
})());</script>
