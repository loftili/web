lft.directive 'lftIcon', ['ICONOGRAPHY', (ICONS) ->

  defaults =
    width: 30
    height: 30
    fill: '#414141'
  
  lftIcon =
    replace: true
    templateUrl: 'directives.icon'
    link: ($scope, $element, $attrs) ->
      svg = d3.select($element[0]).append 'svg'
      width = parseInt ($attrs['width'] || defaults.width), 10
      height = parseInt ($attrs['height'] || defaults.height), 10
      fill = $attrs['fill'] || defaults.fill

      svg.attr
        width: width
        height: height

      name = $attrs['icon']
      icon = ICONS[name]

      translate = ['translate(',(width*0.5),',',(height*0.5),')'].join ''
      scale = ['scale(', (width / defaults.width), ',', (height / defaults.height), ')'].join ''

      group = svg.append 'g'
      group.attr
        'transform': [translate, scale].join ' '

      path = group.append 'path'
      path.attr
        'd': icon
        'fill': fill

]
