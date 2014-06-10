lft.directive 'lftFooter', [() ->

  lftFooter =
    restrict: 'EA'
    replace: true
    templateUrl: 'directives.footer'
    link: ($scope, $element, $attrs) ->
      console.log 'whoa'

]
