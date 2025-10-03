import type { ShowcaseDTO } from "@/lib/cms";
import { abs as toAbs } from "@/lib/cms";

type Props = { data: ShowcaseDTO | ShowcaseDTO[] };

export default function ShowcaseSection({ data }: Props) {
    const first = (Array.isArray(data) ? data[0] : data) ?? null;
    const bg = toAbs(first?.image) || "/images/showcase.png";

    return (
        <section aria-label="showcase" className="pt-7 md:pt-14">
            <div
                className="w-full aspect-[16/11] md:aspect-[16/6] bg-no-repeat bg-center bg-cover"
                style={{ backgroundImage: `url("/images/showcase.png")` }}
            />
        </section>
    );
}
