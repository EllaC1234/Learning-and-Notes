import { RichText, InspectorControls, __experimentalLinkControl as LinkControl, PanelColorSettings } from "@wordpress/block-editor";
import { PanelBody, ColorPalette, ColorPicker } from "@wordpress/components";
import themeColors from "../../inc/excellenceThemeColors"

export default function Edit({ attributes, setAttributes }) {
  const { text, linkObject, buttonColor, textColor } = attributes;
  const textColorOptions = [
                              { name: "black", color: "#000" }, 
                              { name: "white", color: "#fff" }
                           ]

  return (
    <>
      <InspectorControls> 
        <PanelBody title='Link Picker' initialOpen={false} >          
          <LinkControl
            value={linkObject}
            onChange={ ( newLink ) => {
              setAttributes({ linkObject: newLink })
            }}
            settings={ [] }            
          />          
				</PanelBody>
        <PanelBody title='Color Picker' initialOpen={false}>
          <ColorPalette 
            colors={ themeColors } 
            value={ buttonColor } 
            onChange={ (colorCode) => setAttributes({buttonColor: colorCode})}
            disableCustomColors={ true }
            clearable={ false }
          />
        </PanelBody>
        <PanelBody title="Second Color Picker" initialOpen={ false }>
          <ColorPicker 
          	color={ buttonColor }
            onChangeComplete=  { (color) => setAttributes( { buttonColor : color.hex } ) }
            disableAlpha      
          />
        </PanelBody>
        <PanelColorSettings
	        title={ 'Third Color Picker' }
	        initialOpen={ true }
	        colorSettings={[
            {
              value: buttonColor,
              onChange:  (color) => setAttributes( { buttonColor : color } ),
              label: 'Button Color'
            },
            {
              value: textColor,
              onChange:  (color) => setAttributes( { textColor : color } ),
              label: 'Text Color'
            }
          ]}
          colors={ themeColors.concat(textColorOptions) }
          />

      </InspectorControls>
      <div>
        <RichText
          tagName="a"
          className="btn-large"
          placeholder="Type here"
          value={text}
          onChange={(newtext) => setAttributes({ text: newtext })}
          allowedFormats={[]}
          style={{ ...{ color: textColor }, ...{ backgroundColor: buttonColor } }}
        />
      </div>
    </>
  );
}
