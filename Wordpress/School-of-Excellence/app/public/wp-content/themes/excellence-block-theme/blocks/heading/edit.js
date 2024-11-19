import { RichText, BlockControls } from "@wordpress/block-editor";
import { ToolbarGroup, ToolbarButton } from "@wordpress/components";

export default function Edit({ attributes, setAttributes }) {
  const { headingText, size } = attributes;
  return (
    <>
      <BlockControls>
        <ToolbarGroup>
          <ToolbarButton 
            isPressed={ size==="primary"} 
            onClick={ ()=> setAttributes( {size:"primary"} ) }
          >
            Large
          </ToolbarButton>
          <ToolbarButton 
            isPressed={ size==="description"} 
            onClick={ ()=> setAttributes( {size:"description"} ) }
          >
            Medium
          </ToolbarButton>
        </ToolbarGroup>
      </BlockControls>
      
      <div>
        <RichText
          tagName="h2"
          className={`banner-${size}`}
          placeholder="Type the heading here"
          value={headingText}
          onChange={(newtext) => setAttributes({ headingText: newtext })}
          allowedFormats={["core/bold", "core/italic"]}
        />
      </div>
    </>
  );
}
