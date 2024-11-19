import { InnerBlocks, InspectorControls, MediaUpload, MediaUploadCheck } from "@wordpress/block-editor";
import { Button, PanelBody, PanelRow } from "@wordpress/components";

export default function Edit({ attributes, setAttributes }) {
	const { imageID, imageURL } = attributes;

	if ( ! imageURL ) {
		setAttributes( { imageURL: banner.fallbackImage } );
	}

	function onImageSelect(x){
		setAttributes({imageID : x.id})
		setAttributes({imageURL : x.sizes.large.url})
		console.log(imageURL)
	}
  	return (
	<>
		<InspectorControls>
			<PanelBody title="Background Image" initialOpen={true}>
				<PanelRow>
					<MediaUploadCheck>
						<MediaUpload onSelect={onImageSelect} value={imageID} render={ ({ open })=>{
							return <Button onClick={ open }>Choose Image</Button>
						} }/>
					</MediaUploadCheck>
				</PanelRow>
			</PanelBody>
		</InspectorControls>
		
		<div className="image-and-banner">
 			<img className="image" src={imageURL} alt="" />
			<div className="banner-section">
			<div className="banner">
				<InnerBlocks allowedBlocks={["excellenceblocktheme/heading", "excellenceblocktheme/button"]}/>
			</div>
			</div>
		</div>		
	</>	
		);
}