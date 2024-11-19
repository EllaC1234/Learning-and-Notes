import { InnerBlocks } from "@wordpress/block-editor";

export default function Edit({ attributes }) {
	const { imageURL } = attributes;
  return (
		<div className="image-and-banner">
			<img className="image" src={ imageURL } alt="" />
			<div className="banner-section">
			<div className="banner">
				<InnerBlocks.Content />
			</div>
			</div>
		</div>		
		);
}
