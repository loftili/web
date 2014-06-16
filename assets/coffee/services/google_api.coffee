lft.service 'GoogleApi', ['$window', 'GOOGLE', ($window, GOOGLE) ->

  auth_url = do ->
    base = "https://accounts.google.com/o/oauth2/auth"
    params =
      response_type: 'code'
      scope: ['https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/userinfo.email'].join ' '
      redirect_uri: GOOGLE.redirect_uri
      client_id: GOOGLE.client_id
      approval_prompt: 'force'

    p_string = ''
    indx = 0
    console.log params

    angular.forEach params, (value, key) ->
      k_v = [key, value].join '='
      pre = if indx > 0 then '&' else ''
      segment = [pre, k_v].join ''
      p_string += segment
      indx++
  
    return [base, p_string].join '?'

  GoogleApi =

    prompt: () ->
      _handle = $window.open auth_url, 'login', 'width=800,height=600'
      _handle != null


]
