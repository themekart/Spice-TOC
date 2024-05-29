(function (blocks, element, editor) {
  var el = element.createElement;
  var registerBlockType = blocks.registerBlockType;
  var InspectorControls = editor.InspectorControls;
  var PanelBody = wp.components.PanelBody;
  var TextControl = wp.components.TextControl;

  registerBlockType('adv-toc/block', {
    title: 'TOC Block',
    icon: 'list-view',
    category: 'widgets',
    attributes: {
      tocWidth: {
        type: 'string',
        default: '200px'
      },
      tocColor: {
        type: 'string',
        default: '#ffffff'
      }
    },
    edit: function (props) {
      var attributes = props.attributes;

      return [
        el(
          InspectorControls,
          { key: 'controls' },
          el(
            PanelBody,
            { title: 'TOC Settings', initialOpen: true },
            el(
              TextControl,
              {
                label: 'Width',
                value: attributes.tocWidth,
                onChange: function (newWidth) {
                  props.setAttributes({ tocWidth: newWidth });
                }
              }
            ),
            el(
              TextControl,
              {
                label: 'Color',
                value: attributes.tocColor,
                onChange: function (newColor) {
                  props.setAttributes({ tocColor: newColor });
                }
              }
            )
          )
        ),
        el('div', { style: { width: attributes.tocWidth, backgroundColor: attributes.tocColor } }, 'TOC will be rendered here.')
      ];
    },
    save: function () {
      return null; // Rendered dynamically in PHP
    }
  });
}(
  window.wp.blocks,
  window.wp.element,
  window.wp.editor
));
