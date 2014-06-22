lft.service 'AuthManager', [() ->

  current_user = null

  AuthManager =
    
    getCurrentUser: () ->
      current_user

    setCurrentUser: (user) ->
      current_user = user


]
