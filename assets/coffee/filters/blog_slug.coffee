lft.filter 'blogSlug', [() ->

  (input) ->
    if !angular.isString input
      return input

    lower = input.toLowerCase()
    just_chars = lower.replace /[^\w\s]/g, ''
    dashed = just_chars.replace /\s/g, '-'

    dashed

]
