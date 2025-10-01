import { ShowcaseDTO } from "@/lib/cms";

export default function ShowcaseSection({ data }: { data: ShowcaseDTO }) {
    return (
        <section className="pt-7 md:pt-14">
            <div
                className="w-full aspect-[16/11] md:aspect-[16/6]"
                style={{
                    backgroundImage: `url(${data.image})`,
                    backgroundRepeat: "no-repeat",
                    backgroundPosition: "center center",
                    backgroundSize: "cover",
                }}
            />
        </section>
    );
}
