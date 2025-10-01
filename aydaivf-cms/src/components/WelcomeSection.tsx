"use client";

import Image from "next/image";

type Props = {
    subtitle: string;
    title: string;
    content: string;
    image: string;
    ceo_name: string;
    ceo_title: string;
};

export default function WelcomeSection({
                                           subtitle,
                                           title,
                                           content,
                                           image,
                                           ceo_name,
                                           ceo_title,
                                       }: Props) {
    return (
        <section className="py-7 md:py-14">
            <div className="container flex flex-col lg:flex-row gap-8 lg:gap-4 lg:items-center">

                {/* Left - Image */}
                <div className="lg:flex-[0.4] flex items-center justify-center">
                    <div
                        className="w-full max-w-[400px] lg:max-w-none aspect-square relative"
                        style={{
                            background:
                                "radial-gradient(circle, rgb(30, 170, 207), rgb(240, 143, 178) 45%, rgba(250, 250, 250, 0) 65%)",
                        }}
                    >
                        <Image
                            src={image}
                            alt="ayda-ceo"
                            fill
                            className="w-full h-full object-contain rounded-br-[37%] rounded-bl-[37%]"
                            style={{
                                filter: "drop-shadow(black 0px 4px 4px)",
                            }}
                        />
                    </div>
                </div>

                {/* Right - Text */}
                <div className="lg:flex-[0.6]">
                    <p className="text-sm md:text-base text-ayda-pink-dark uppercase text-center">
                        {subtitle}
                    </p>
                    <p className="text-2xl md:text-3xl lg:text-4xl text-ayda-black font-bold text-center mb-4">
                        {title}
                    </p>
                    <div
                        className="text-sm md:text-base text-ayda-gray prose max-w-none"
                        dangerouslySetInnerHTML={{ __html: content }}
                    />
                    <p className="mt-4 text-right font-bold text-lg text-ayda-black">{ceo_name}</p>
                    <p className="text-right text-ayda-pink-dark">{ceo_title}</p>
                </div>
            </div>
        </section>
    );
}
