"use client";

import Image from "next/image";

type HeroData = {
    background: string;
    dots: string;
    title: string;
    subtitle: string;
    footerText: string;
    workhours: string;
    locale: "tr" | "en";
};

export default function Hero(props: HeroData) {
    const { background, dots, title, subtitle, footerText, workhours } = props;

    return (
        <section className="h-[calc(70dvh-80px)] md:h-[calc(100dvh-80px)] relative">
            {/* Background Images */}
            <div
                className="w-full h-full"
                style={{
                    backgroundImage: `url(${dots}), url(${background})`,
                    backgroundRepeat: "repeat, no-repeat",
                    backgroundPosition: "left top, center center",
                    backgroundSize: "auto, cover",
                }}
            ></div>

            {/* Centered Title + Subtitle */}
            <div className="z-30 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center">
                <p className="text-sm breakpoint-500:text-base md:text-xl text-ayda-pink-light">
                    {subtitle}
                </p>
                <p className="text-2xl breakpoint-500:text-3xl md:text-6xl text-ayda-pink-dark font-medium">
                    {title}
                </p>
            </div>

            {/* Rotated Workhours */}
            <p className="z-30 font-medium uppercase absolute top-1/2 right-0 -translate-y-1/2 text-xs md:text-xl text-ayda-white tracking-[5px] rotate-90 translate-x-[calc(50%-16px)] breakpoint-500:translate-x-[calc(50%-24px)] md:translate-x-[calc(50%-28px)] whitespace-nowrap">
                {workhours}
            </p>

            {/* Footer Text */}
            <div className="flex flex-col sm:flex-row gap-1 items-start sm:gap-0 sm:justify-between absolute bottom-[5px]  w-full px-4">
                <p className="z-30 capitalize text-xs md:text-sm text-ayda-white font-medium">
                    {footerText}
                </p>
            </div>
        </section>
    );
}
